document.addEventListener("DOMContentLoaded", () => {
  loadTable();
  setTimeout(() => {
    sendData();
    deleteData();
    loadUpdate();
  }, 1000);
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
        const arrData = data.data;
        let row = "";
        arrData.forEach((element) => {
          row += `<tr>
                    <td>${element.contador}</td>
                    <td>${element.idestudiante}</td>
                    <td>${element.idpension}</td>
                    <td>${element.fecha_pago}</td>
                    <td>${element.pago}</td>
                    <td class="form-actions">
                    <button class="btn-info btn-update" 
                                data-id="${element.idhistorial_pago}"
                                data-idpension="${element.idpension}"
                                data-idestudiante="${element.idestudiante}"
                                data-fecha_pago="${element.fecha_pago}"
                                data-pago="${element.pago}"> Actualizar</button>
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
          setTimeout(() => {
            deleteData();
            loadUpdate();
            let formSend = document.getElementById("formSend");
            let inputHidden = formSend.querySelector(
              "input[name='historial_pago']"
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
/*** Esta funcion se carga de eliminar un reguistro*/
function deleteData() {
  let dataBtnDelete = document.querySelectorAll(".btn-delete");
  dataBtnDelete.forEach((itemButton) => {
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
      const url = base_url + "Logic/historial_pago/delete.php";
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
            } else alert(resData.msg);
          })
          .catch((error) => {
            alert(error.message);
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
      const idpension = element.getAttribute("data-idpension");
      const fecha_pago = element.getAttribute("data-fecha_pago");
      const idestudiante = element.getAttribute("data-idestudiante");
      const pago = element.getAttribute("data-pago");
      //carga en los campos del formulario/
      document.getElementById("sltEstudiante").value = idestudiante;
      document.getElementById("sltPension").value = idpension;
      document.getElementById("txtFecha_pago").value = fecha_pago;
      document.getElementById("txtpago").value = pago;
      document.getElementById("btnsendData").innerHTML = "Actualizar";
      /**creamos el elemento de tipo hidden que ya a contener el id */
      const inputHidden = document.createElement("input");
      inputHidden.setAttribute("type", "hidden");
      inputHidden.setAttribute("name", "historial_pago");
      inputHidden.setAttribute("value", id);
      /**agregamos el input al formulario */
      document.getElementById("formSend").appendChild(inputHidden);
      alert("Campos cargados");
    });
  });
}