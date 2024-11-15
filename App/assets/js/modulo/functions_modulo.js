document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    sendData();
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
                            <td>
                                <button onclick="editModule(${element.idmodulo})">Editar</button>
                                <button onclick="deleteModule(${element.idmodulo})">Eliminar</button>
                            </td>
                        </tr>`;
                });
                table.innerHTML = rows;
            } else {
                console.log("No se encontraron datos.");
            }
        })
        .catch((error) => {
            console.log("Error: ", error.message);
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
                } else {
                    alert("Error: " + resData.msg);
                }
            })
            .catch((error) => {
                console.log("Error: ", error.message);
            });
    });
}

// Ejemplo de funciones para editar y eliminar un módulo
function editModule(id) {
    alert("Función para editar el módulo con ID " + id);
    // Aquí puedes agregar la lógica para editar el módulo
}

function deleteModule(id) {
    alert("Función para eliminar el módulo con ID " + id);
    // Aquí puedes agregar la lógica para eliminar el módulo
}
