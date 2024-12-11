document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    setTimeout(() => {
        SendData();
    deleteData();
    loadUpdate();
    }, 1000);   
});
function loadTable() {

    let table = document.getElementById("table-body");
    let url = base_url + "Logic/pension/read.php";
    fetch(url)
        .then((Response) => {
            if (!Response.ok) {
                throw new error("ocurrio un error inesperado: " + Response.status);

            }
            return Response.json();

        })
        .then((data) => {
            if (data.status) {
                const arrData = data.data
                let row = "";
                arrData.forEach((element) => {
                    row += ``;
                    row += `<tr>
             <td>${element.idpension}</td>
             <td>${element.nombre}</td>
             <td>${element.precio}</td>
             <td>${element.porcentaje_descuento}</td>
             <td>${element.porcentaje_incremento}</td>
             <td>${element.idmodulo}</td>
             <td class="form-actions">
               <button class="btn-info btn-update"
                data-id="${element.idpension}"
                data-nombre="${element.nombre}"
                data-precio="${element.precio}"
                data-porcentaje_descuento="${element.porcentaje_descuento}"
                data-porcentaje_incremento="${element.porcentaje_incremento}"
                data-idmodulo="${element.idmodulo}"> Actualizar</button>
               <button class="btn-danger btn-delete" data-id="${element.idpension}"> Eliminar</button>
             </tr>`;
                });
                table.innerHTML = row;
            }
        })
        .catch((error) => {
            console.log(error);

        });

}
function SendData() {
    let dataFormSend = document.getElementById("formSend");
    dataFormSend.addEventListener("submit", (e) => {
        e.preventDefault();
        const data = new FormData(dataFormSend);
        const encabezados = new Headers();
        const config = {
            method: "POST",
            Headers: encabezados,
            node: "cors",
            cache: "no-cache",
            body: data,
        };
        const url = base_url + "Logic/pension/create.php";
        fetch(url, config)
            .then((result) => {
                if (!result.ok) {
                    throw new error("ocurrio un error inesperado:" + result.status);
                }
                return result.json();
            })
            .then((resData) => {
                if (resData.status) {
                    loadTable();
                    dataFormSend.reset();
                    alert(resData.msg);
                    setTimeout(() => {
                        deleteData();
                        loadUpdate();
                        }, 500);
                } else {
                    alert(resData.msg);
                }
            })
            .catch((error) => {
                console.log(error);
            });
    });
}

function deleteData() {
    let dataBtnDelete = document.querySelectorAll(".btn-delete");
    dataBtnDelete.forEach(itemButton => {
        itemButton.addEventListener("click", () => {
            let id = itemButton.getAttribute("data-id");
            const data = new FormData();
            //agregando el id
            data.append("txtID", id);
            const encabezados = new Headers();
            const config = {
                method: "post",
                headers: encabezados,
                node: "cors",
                cache: "no-cache",
                body: data,
            };
            const url = base_url + "Logic/pension/delete.php";
            //Alerta que pregunta si desea eliminar el registro
            if (confirm("Desea eliminar este registro")) {
                fetch(url, config)
                    .then((result) => {
                        if (!result.ok) {
                            throw new Error("ocurrio un error inesperado:" + result.status);
                        }
                        return result.json();
                    })
                    .then((resData) => {
                        if (resData.status) {
                            loadTable();
                            alert(resData.msg);
                            setTimeout(() => {
                            deleteData();
                            loadUpdate();
                            }, 500);
                        } else
                            alert(resData.msg);
                    })
                    .catch((error) => {
                        alert(error.message)
                    });
            }
        });
    });
}
  function loadUpdate() {
    const btnUpdate = document.querySelectorAll(".btn-update");
    btnUpdate.forEach((element) => {
      element.addEventListener("click", (e) => {
        const id = element.getAttribute("data-id");
        const nombre = element.getAttribute("data-nombre");
        const precio = element.getAttribute("data-precio");
        const porcentaje_descuento = element.getAttribute("data-porcentaje_descuento");
        const porcentaje_incremento = element.getAttribute("data-porcentaje_incremento");
        const idmodulo = element.getAttribute("data-idmodulo");
        //*carga en los campos del formulari
        document.getElementById("txtNombre").value = nombre;
        document.getElementById("txtprecio").value = precio;
        document.getElementById("txtporcentaje_descuento").value = porcentaje_descuento;
        document.getElementById("txtporcentaje_incremento").value = porcentaje_incremento;
        document.getElementById("sltmodulo").value = idmodulo;
        document.getElementById("btnsendData").innerHTML = "Actualizar";
        /**creamos el elemento de tipo hidden que ya a contener el id */
        const inputHidden = document.createElement("input");
        inputHidden.setAttribute("type", "hidden");
        inputHidden.setAttribute("name", "pension");
        inputHidden.setAttribute("value", id);
        /**agregamos el input al formulario */
        document.getElementById("formSend").appendChild(inputHidden);
        alert("Campos cargados");
      });
    });
  }