import apiPais from "../API/apiPais.js";

export default {
    async showPais(){
        document.querySelector(".contMain").innerHTML =  `
    <h1 class="title">Pais</h1>
    <ul class="breadcrumbs">
        <li><a  id="agregarPais" style="cursor: pointer;" class="active">Agregar</a></li>
        <li class="divider">/</li>
        <li><a class="registroPais" style="cursor: pointer;">Registro</a></li>
    </ul>
    <div class="containerForm">
    <h1 class="text-center">Pais</h1>
        <form class="formTables" id="formPais">
        <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center mb-3">
            <label for="">Ingrese el nombre del pais</label>
            <input class="form-control mt-2" type="text" name="nombrePais" required placeholder="Nombre pais">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button class="btnSubmit" type="submit"> Agregar </button>
        </div>
        </div>  
        </form>
	</div>`

    this.agregarPais();
    this.showRegistro();
    },

    agregarPais(){
        let formPais = document.querySelector("#formPais")
        formPais.addEventListener("submit", async (e)=>{
        e.preventDefault();
        let data = Object.fromEntries(new FormData(e.target));

       let res = await apiPais.postPais(data);
        alert(res);
        formPais.reset();
        })
    },

    showRegistro(){
        let registro = document.querySelector(".registroPais");
        let agregar = document.querySelector("#agregarPais");
        registro.addEventListener("click", async (e)=>{
           let data = await apiPais.getPais();
            document.querySelector(".containerForm").innerHTML = `
            <div class="cont">
            <h2>Pais</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                    </tr>
                </thead>
                <tbody class="tableBody">
                ${data.MESSAGE.map(pais=>{
                    return `
                    <tr>
                    <td>${pais.idPais}</td>
                    <td>${pais.nombrePais}</td>
                    <td class="contBut"><button  data-id="${pais.idPais}" id="modificar" class="btnSelec">M</button> <button data-id="${pais.idPais}" id="eliminar" class="btnSelec">X</button></td>
                    </tr>
                    `
                }).join("")}
                </tbody>
            </table>
            </div>`;
            registro.className += " active";
            agregar.classList.remove("active");

            this.DeletePais();
            this.showUpdate();
            this.showForm();
            
        })
    },

    showForm(){
        let registro = document.querySelector(".registroPais");
        let agregar = document.querySelector("#agregarPais");

        agregar.addEventListener("click",(e)=>{
          this.showPais();
        agregar.className += " active";
        registro.classList.remove("active");
        })
    },

    DeletePais(){
        let btnDelete = document.querySelectorAll("#eliminar");
        btnDelete.forEach((val,id) => {
            val.addEventListener("click", async (e)=>{
                console.log(val.dataset.id);
                let data =val.dataset.id;
                let res = await apiPais.deletePais(data);
               alert(res);
                window.location.reload();
            })
        });
    },

    showUpdate(){
        let btnUpdate = document.querySelectorAll("#modificar");
        btnUpdate.forEach((val,id) => {
            console.log(val);
            val.addEventListener("click", async (e)=>{
                let idpais = val.dataset.id;
                let paisUpdate = await apiPais.getPaisId(idpais);
                console.log(paisUpdate);
               document.querySelector(".containerForm").innerHTML =  `
               <h1 class="text-center">Modificar Pais</h1>
            <form class="formTables" id="newForm">
            <div class="row">
            <div class="col-12 d-flex flex-column justify-content-center mb-3">
                <label for="">Ingrese el nuevo pais</label>
                <input class="form-control" value="${paisUpdate.MESSAGE[0].nombrePais}" type="text" name="nombrePais" required placeholder="Nombre pais">
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button id="${idpais}" class="btnSub fs-4" type="submit"> Modificar </button>
            </div>
            </div>  
            </form>`;
           this.updateRegion();
            })
        });
    },

    updateRegion(){
        let newForm = document.querySelector("#newForm");
        newForm.addEventListener("submit", async (e)=>{
        e.preventDefault();
        let btnSub = document.querySelector(".btnSub");
        let id = btnSub.id;
        console.log(id);
        let data = Object.fromEntries(new FormData(e.target));
        let res = await apiPais.updatePais(data, id);
        alert(res);
        newForm.reset();
        window.location.reload();
        })
    }

}