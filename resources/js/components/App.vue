<template>
    <main>
        <div class="row">

        <div class="col-4"></div> 
        <div class="col-4">
            <form id="formLogin">
                <div class="mb-3">
                    <h2><center>===**LOGIN**===</center></h2>
                </div>
                 <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" v-model="usuario" name="usuario" class="form-control" id="usuario" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                    <input type="password" v-model="password" name="password" class="form-control" id="password" placeholder="password">
                </div>
                <center><button type="button" @click='login()' class="btn btn-primary">Aceptar</button></center>
            </form>
        </div>
        </div>
        <div>
         
        </div>
    </main>
  
</template>

<script>
export default {
    name : 'login',
  data() {
    
    return {
      usuario: null,
      password: null,
      error: null,
      info: null
    };
  },
  methods: {
    login() {
        const Joi = require("joi");

        const userSchema = Joi.object({
            usuario: Joi.string().max(30).required().email({ tlds: { enable: false } }),
            password: Joi.string().required().min(6),
        });
        const userData = {
            usuario: this.usuario,
            password: this.password,
        };
        const { error, value } = userSchema.validate(userData);
        if (error) {
            this.$toasted.error(error.details[0]['message']);
        } else {
           

            try {
                const  data =  axios.post(
                    'api/login',
                  {
                    email : this.usuario,
                    password: this.password
                  }
                ).then(response =>{
                    this.$toasted.success('Bienvenido: '+this.usuario);
                    this.axios.defaults.headers.common['Authorization'] = 'Bearer' + response.data.token
                    console.log(response.data.token);
                    localStorage.setItem('token', response.data.token);
                    this.$router.push('/home');
                    }
                 )
                 .catch(error => {
                    this.errorMessage = error.message;
                    console.error( error.message);
                    this.$toasted.error('Usuario o Password incorrecto');
                    });
               
            
              } catch (error) {
                console.log(error);
              }
           
        }
        //usuario: this.usuario,
        //password: this.password
    }
  }
};
</script>