<template>

<div class="container my-5 p-5 z-depth-1 unique-color-dark">
  <section class="text-center white-text">
    <h2 class="font-weight-bold mb-4 pb-2 text-white text-uppercase">Mes Informations</h2>
<notifications group="success" position="bottom right" />
    <div class="row d-flex justify-content-around ">

   <div class="col-12 col-md-8 mb-4 bg-white p-3">
      <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" v-model="pseudo">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" class="form-control" v-model="emailUpdate" aria-describedby="adresse email">
      </div>
      <button @click="update()" class="btn btn-outline-success">Valider</button>
   </div>


   <a @click="deleteUser()" href="#" class="col-12 col-md-6 mt-5 itemAccount">
      <div>
        <i class="fas fa-brain fa-3x text-white"></i>
            <h5 class="text-white font-weight-bold my-4 text-uppercase">Supprimer mon compte</h5>
      </div>
   </a>

    </div>
  </section>
</div>

</template>


<script>
export default {
  data () {
    return {
       pseudo: this.name,
       emailUpdate: this.email,
    }
  },
  methods: {
     deleteUser(){
      axios.post('/account/delete', {
         id: this.id
      })
         .then(response => {
        if (response.status == 200) {
           window.location = "/"
            }
         })
         .catch(error => {
            console.log(error)
         });
     },

     update(){
         axios.post('/account/information/update', {
            name: this.pseudo,
            email: this.emailUpdate,
         })
         .then(response => {
            if (response.status == 200) {
              this.$notify({
                  group: 'success',
                  type: 'success',
                  title: 'Modification',
                  speed: 1000,
                  text: 'Modification effectuée!',
               });
            }
            if (response.status == 201) {
              this.$notify({
                  group: 'success',
                  type: 'info',
                  title: 'Modification',
                  speed: 1000,
                  text: 'Aucune modification nécessaire!',
               });
            }
         })
         .catch(error => {
            console.log(error.response.data )
         });
     }

  },
  props: ['name', 'email', 'id'],
    
}
</script>