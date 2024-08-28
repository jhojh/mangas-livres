
const formRegister = document.querySelector("#formcasd");
formRegister.addEventListener("submit",async (event) => {

    event.preventDefault();
    const data = await fetch(`http://localhost/pwjhojh02-04/api/users`,{
        method: "POST",
        body: new FormData(formRegister)
    });

    const user = await data.json();
    console.log(user);
});
