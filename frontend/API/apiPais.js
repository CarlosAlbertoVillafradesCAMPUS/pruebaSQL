export default {
    async getPais(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"},
        }

        let data = await (await fetch("http://localhost/prueba_piloto_villafrades/uploads/pais", config)).json();
        return data;
    },

    async getPaisId(id){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"},
        }

        let data = await (await fetch(`http://localhost/prueba_piloto_villafrades/uploads/pais/${id}`, config)).json();
        return data;
    },

    async postPais(data){
        let config = {
            method: "POST",
            header: {"Content-Type": "application/json"},
            body:JSON.stringify(data)
        }
        let res = await (await fetch("http://localhost/prueba_piloto_villafrades/uploads/pais", config)).text();
        return res;
    },

    async updatePais(data, id){
        let config = {
            method: "PUT",
            header: {"Content-Type": "application/json"},
            body:JSON.stringify(data)
        }
        let res = await (await fetch(`http://localhost/prueba_piloto_villafrades/uploads/pais/${id}`, config)).text();
        return res;
    },

    async deletePais(id){
        let config = {
            method: "DELETE",
            header: {"Content-Type": "application/json"},
        }

        let res = await (await fetch(`http://localhost/prueba_piloto_villafrades/uploads/pais/${id}`, config)).text();
        return res;
    }
}