<template>
<div class="container-fluid px-0 z-depth-1">

  <section class="p-5 text-center" 
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;height:100vh;">

    <form class="my-5 mx-md-5" action="">

      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">

              <form class="text-center" style="color: #757575;" @submit.prevent="submit">
                <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Création du Quiz</h3>

               <div class="form-floating">
                 <select class="form-select" id="theme" aria-label="Theme du questionnaire">
                   <option value="" disabled selected>Choisir un thème</option>
                   <option  v-for="theme in themes" :key="theme.id" :v-model="theme"  :value="theme.id">{{theme.titre}}</option>
                 </select>
                 <label for="theme">Thème du questionnaire</label>
                 <div v-if="erreurs && erreurs.theme" class="text-danger">{{ erreurs.theme[0] }}</div>
               </div>

               <div class="form-floating my-3">
                 <input type="text" class="form-control" id="titre" :v-model="titre" value="" placeholder="Titre">
                 <label for="titre">Titre du questionnaire</label>
                 <div v-if="erreurs && erreurs.titre" class="text-danger">{{ erreurs.titre[0] }}</div>
               </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-outline-primary btn-rounded my-4 waves-effect">Créer les questions</button>
                  <button type="button" @click="annuler()" class="ml-2 btn btn-outline-danger btn-rounded my-4 waves-effect">Annuler</button>
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
    </form>
  </section>
</div>

</template>


<script>
export default {
  data() {
    return {
      erreurs: {},
    }
  },
  methods: {
     annuler(){
        window.location = "/account"
     },
     submit(){
        this.erreurs = {};
        axios.post('/create/quiz', {
            theme: theme.value,
            titre: titre.value,
         })
         .then(response => {
            if (response.status == 200) {
               window.location = "/create/questions/"+response.data
            }
         })
         .catch(error => {
            if (error.response.status == 422) {
                this.erreurs = error.response.data.errors || {};
            }
         });

     }
  },
  props: ['themes'],
}
</script>