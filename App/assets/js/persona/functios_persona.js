document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    setTimeout(() => {
    SendData();
        daleteData();
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
    <button class=btn-info"> Actualizar</button>
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
