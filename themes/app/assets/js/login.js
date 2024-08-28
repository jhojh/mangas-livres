
const formlogin = document.querySelector("#form-login");
formlogin.addEventListener("submit",async (event) => {

    event.preventDefault();
    const data = await fetch(`http://localhost/pwjhojh02-04/api/users/login`,{
        method: "POST",
        body: new FormData(formlogin)
    });

    const user = await data.json();
    console.log(user);
});
