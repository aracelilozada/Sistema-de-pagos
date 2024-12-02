document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    sendData();
});
function loadTable() {
    let table = document.getElementById("table-body");
    let url = base_url + "Logic/historial_pago/read.php";
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
             <td>${element.idestudiante}</td>
             <td>${element.idpension}</td>
             <td>${element.fecha_pago}</td>
             <td>${element.pago}</td>
             <td>${element.estado_pago}</td>
             <td class="form-actions">
               <button class=btn-info"> Actualizar</button>
               <button class="btn-danger btn-delete" data-id="${element.idhistorial_pago}"> Eliminar</button>
             </td>`;
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
        const url = base_url + "Logic/historial_pago/create.php";
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
                } else {
                    alert(resData.msg);
                }
            })
            .catch((error) => {
                console.log(error);
            });
    });
}

