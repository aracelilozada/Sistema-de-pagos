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
  let url = base_url + "Logic/carrera/read.php";
  fetch(url)
    .then((Response) => {
      if (!Response.ok) {
        throw new Error("Ocurrio un error inesperado:" + Response.status);
      }
      return Response.json();
    })
    .then((data) => {
      if (data.status) {
        const arrData = data.data;
        let row = "";
        arrData.forEach((element) => {
          row += `<tr>
                      
                      <td>${element.idcarrera}</td>
                      <td>${element.nombres}</td>
                      <td>${element.descripcion}</td>
                      <td>${element.estado}</td>
                      <td class="form-actions">
                      <button class="btn-info btn-update" 
                                  data-id="${element.idcarrera}"
                                  data-nombres="${element.nombres}"
                                  data-descripcion="${element.descripcion}"
                                  data-estado="${element.estado}"> Actualizar</button>
                      <button class="btn-danger btn-delete" data-id="${element.idcarrera}"> Eliminar</button>
                  </td>
                  </tr>`
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
    const url = base_url + "Logic/carrera/create.php";
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
            let inputHidden = formSend.querySelector("input[name='carrera']")
            if (inputHidden) {
              inputHidden.remove();
            }
            document.getElementById("btnsenData").innerHTML = "Registrar";
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
      const url = base_url + "Logic/carrera/delete.php";
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
function loadUpdate() {
  const btnUpdate = document.querySelectorAll(".btn-update");
  btnUpdate.forEach((element) => {
    element.addEventListener("click", (e) => {
      const id = element.getAttribute("data-id");
      const nombres = element.getAttribute("data-nombres");
      const descripcion = element.getAttribute("data-descripcion");
      const estado = element.getAttribute("data-estado");
      //*carga en los campos del formulari
      document.getElementById("txtnombre").value = nombres;
      document.getElementById("txtdescripcion").value = descripcion;
      document.getElementById("sltestado").value = estado;
      document.getElementById("btnsendData").innerHTML = "Actualizar";
      /**creamos el elemento de tipo hidden que ya a contener el id */
      const inputHidden = document.estadocreateElement("input");
      inputHidden.setAttribute("type", "hidden");
      inputHidden.setAttribute("name", "carrera");
      inputHidden.setAttribute("value", id);
      /**agregamos el input al formulario */
      document.getElementById("formSend").appendChild(inputHidden);
      alert("Campos cargados");
    });
  });
}