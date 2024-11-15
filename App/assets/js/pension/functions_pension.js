document.addEventListener("DOMContentLoaded", () => {
    loadTable();
    SendData();
});
function loadTable() {

    let table = document.getElementById("table-body");
    let url = base_url + "Logic/pension/leer.php";
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
<td>${element.porcntajedescuento}</td>
<td>${element.porcentajeincremento}</td>
<td>${element.idmodulo}</td>
<td>Botones</td>
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
                } else {
                    alert(resData.msg);
                }
            })
            .catch((error) => {
                console.log(error);
            });
    });
}
