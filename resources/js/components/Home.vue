<template>
    <div class="container d-flex flex-column align-items-center justify-content-center vh-100">

        <div class="container-fluid bg-1 text-center">
            <h3 class="margin">Home</h3>
            <div class="text-center">
                    Bem-vindo! essa aplicação foi desenvolvida para demonstrar o funcionamento
                    de uma consulta de API externa utilizando Laravel e o sistema de rotas com VUE.   
            </div>
            <img  style="display:inline" width="50%" height="50%" src="https://cylab.be/storage/blog/90/files/2aBQjzO5wPZGljqLC0fnwZ5nY6uNLl6dVCB23gLW.png" alt="Descrição da imagem">    
            
        </div>
       
        <!-- Transformando o link em um botão -->
        <button @click="$router.push('/main')" class="btn btn-primary mt-3">Vamos começar!</button>
    </div>
</template>

<style>
body {
  font: 20px Montserrat, sans-serif;
  line-height: 1.8;
}
p {font-size: 16px;}
.margin {margin-bottom: 45px;}
.bg-1 { 
  background-color: #1abc9c; /* Green */
  color: #ffffff;
}
.bg-2 { 
  background-color: #474e5d; /* Dark Blue */
  color: #ffffff;
}
.bg-3 { 
  background-color: #ffffff; /* White */
  color: #555555;
}
.bg-4 { 
  background-color: #2f2f2f; /* Black Gray */
  color: #fff;
}
.container-fluid {
  padding-top: 70px;
  padding-bottom: 70px;
}


</style>