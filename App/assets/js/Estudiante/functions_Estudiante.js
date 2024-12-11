document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    setTimeout(() => {
    sendData();
    deleteData();
}, 1000);
});
function loadTable() {
    let table = document.getElementById("table-body");
    let url = base_url + "Logic/Estudiante/read.php";
    fetch(url)
        .then((Response) => {
            if (!Response.ok) {
                throw new Error("Ocurrio un inesperado:" + Response.status);
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
             <td>${element.estado}</td>
              <td class="form-actions">
            
               <button class="btn-danger btn-delete" data-id="${element.idestudiante}"> Eliminar</button>
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
function sendData() {
    let dataFormSend = document.getElementById("formSend");
    dataFormSend.addEventListener("submit", (e) => {
        e.preventDefault();
        const data = new FormData(dataFormSend);
        const encabezados = new Headers();
        const config = {
            method: "POST",
            headers: encabezados,
            node: "cors",
            cache: "no-cache",
            body: data,
        };
        const url = base_url + "Logic/Estudiante/create.php";
        fetch(url, config)
            .then((result) => {
                if (!result.ok) {
                    throw new Error("ocurrio un error inesperado: " + result.status);
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
            const url = base_url + "Logic/Estudiante/delete.php";
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

