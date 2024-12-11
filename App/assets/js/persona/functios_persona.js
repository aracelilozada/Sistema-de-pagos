document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    setTimeout(() => {
    SendData();
        daleteData();
        loadUpdate();
    }, 1000);

});
function loadTable() {

    let table = document.getElementById("table-body");
    let url = base_url + "Logic/persona/read.php";
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
                    row += `<tr>
     <td>${element.contador}</td>             
    <td>${element.nombres}</td>
    <td>${element.apellidos}</td>
    <td>${element.DNI}</td>
    <td>${element.telefono}</td>
    <td>${element.correo_electronico}</td>
    <td>${element.direccion}</td>
    <td>${element.fecha_de_nacimiento}</td>
    <td class="form-actions">
    <button class="btn-info btn-update"    
                                data-id="${element.idpersona}"
                                data-nombres="${element.nombres}"
                                data-apellidos="${element.apellidos}"
                                data-DNI="${element.DNI}"
                                data-telefono="${element.telefono}"
                                data-correo_electronico="${element.correo_electronico}"
                                data-direccion="${element.direccion}"
                                data-fecha_de_nacimiento="${element.fecha_de_nacimiento}"> Actualizar</button>
    <button class="btn-danger btn-delete" data-id="${element.idpersona}"> Eliminar</button>
    </tr>`;
                });
                table.innerHTML = row;
            }
        })
        .catch((error) => {
            console.log(error);

        });

}
/*Este foncion se encarga de enviar la data y registrar o actualizar */
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
        const url = base_url + "Logic/persona/create.php";
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
                        daleteData();
                        loadUpdate();
                        let formSend = document.getElementById("formSend");
                        let inputHidden = formSend.querySelector(
                          "input[name='carrera']"
                        );
                        if (inputHidden) {
                          inputHidden.remove();
                        }
                        document.getElementById("btnsendData").innerHTML = "Registrar";
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
/**
 * Esta funcion se carga de eliminar un reguistro
 */
function daleteData() {
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
            const url = base_url + "Logic/persona/delete.php";
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
                            daleteData();
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

//Esta funcion se encarga de actualizar un registro
function loadUpdate() {
    const btnUpdate = document.querySelectorAll(".btn-update");
    btnUpdate.forEach((element) => {
      element.addEventListener("click", (e) => {
        const id = element.getAttribute("data-id");
        const nombres = element.getAttribute("data-nombres");
        const apellidos = element.getAttribute("data-apellidos");
        const DNI = element.getAttribute("data-DNI");
        const telefono = element.getAttribute("data-telefono");
        const correo_electronico = element.getAttribute("data-correo_electronico");
        const direccion = element.getAttribute("data-direccion");
        const fecha_de_nacimiento = element.getAttribute("data-fecha_de_nacimiento");
        //carga en los campos del formulario/
        document.getElementById("txtnombres").value = nombres;
        document.getElementById("txtapellidos").value = apellidos;
        document.getElementById("txtDNI").value = DNI;
        document.getElementById("txttelefono").value = telefono;
        document.getElementById("txtcorreo").value = correo_electronico;
        document.getElementById("txtdireccion").value = direccion;
        document.getElementById("txtfechadenacimiento").value = fecha_de_nacimiento;
        document.getElementById("btnsendData").innerHTML = "Actualizar";
        /**creamos el elemento de tipo hidden que ya a contener el id */
        const inputHidden = document.createElement("input");
        inputHidden.setAttribute("type", "hidden");
        inputHidden.setAttribute("name", "btnsendData");
        inputHidden.setAttribute("value", id);
        /**agregamos el input al formulario */
        document.getElementById("formSend").appendChild(inputHidden);
        alert("Campos cargados");
      });
    });
  }
