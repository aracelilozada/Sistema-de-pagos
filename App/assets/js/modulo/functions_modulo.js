document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    setTimeout(() => {
        sendData();
        deleteData();
    }, 1000);
});

function loadTable() {
    let table = document.getElementById("table-body");
    let url = base_url + "Logic/modulo/read.php"; // Cambia la URL si es necesario
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Ocurrió un error inesperado: " + response.status);
            }
            return response.json();
        })
        .then((data) => {
            if (data.status) {
                const arrData = data.data;
                let rows = "";
                arrData.forEach((element) => {
                    rows += `
                        <tr>
                            <td>${element.idmodulo}</td>
                            <td>${element.nombre}</td>
                            <td>${element.descripcion}</td>
                            <td>${element.estado}</td>
                            <td>${element.idcarrera}</td>
                            <td class="form-actions">
                            <button class=btn-info"> Actualizar</button>
                            <button class="btn-danger btn-delete" data-id="${element.idmodulo}"> Eliminar</button>
                            </td>
                        </tr>`;
                });
                table.innerHTML = rows;
            }
        })
        .catch((error) => {
            console.log(error);
        });
}

// Función para enviar los datos del formulario
function sendData() {
    let dataFormSend = document.getElementById("formSend");
    dataFormSend.addEventListener("submit", (e) => {
        e.preventDefault();
        const data = new FormData(dataFormSend);
        const headers = new Headers();
        const config = {
            method: "POST",
            headers: headers,
            mode: "cors",
            cache: "no-cache",
            body: data,
        };
        const url = base_url + "Logic/modulo/create.php"; // Cambia la URL si es necesario
        fetch(url, config)
            .then((result) => {
                if (!result.ok) {
                    throw new Error("Ocurrió un error inesperado: " + result.status);
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
            const url = base_url + "Logic/modulo/delete.php";
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
