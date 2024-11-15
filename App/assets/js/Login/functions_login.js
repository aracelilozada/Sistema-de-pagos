document.addEventListener("DOMContentLoaded", () => {
    login();

  });
  
  function login() {
    let form = document.getElementById("form_login");
    form.addEventListener("submit", (event) => {
      event.preventDefault();
      let data = new FormData(form);
      let headers = new Headers();
      let config = {
        method: "POST",
        headers: headers,
        node: "cors",
        cache: "no-cache",
        body: data,
      };
      let url = base_url + "Logic/login/login.php";
      fetch(url, config)
        .then((response) => {
          if (!response.ok) {
            throw new Error(
              "Error! status:" + response.status + " - " + response.statusText
            );
          }
          return response.json();
        })
        .then((data) => {
          if (data.status) {
            window.location.href = base_url + "App/" + data.url;
          } else {
            alert(data.content);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    });
  }
  