<template>
<div class="container-fluid px-0 z-depth-1">
<notifications group="success" position="bottom right" />
  <section class="p-5 text-center" 
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;height:100vh;">

    <form class="my-5 mx-md-5" action="">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">

              <form class="text-center" style="color: #757575;" @submit.prevent="submit">
                <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Création des questions pour "{{questionnaire.titre}}"</h3>
               <p class="text-muted">Il faut au moins 5 questions pour valider le questionnaire</p>
               <p class="text-muted">Nombre de question actuellement : {{numbers}}</p>
            <div>

               <div class="form-floating">
                 <input type="text" class="form-control" id="question" :v-model="question" value="" placeholder="question">
                 <label for="question">Question</label>
                 <div v-if="erreurs && erreurs.question" class="text-danger">{{ erreurs.question[0] }}</div>
               </div>

               <div class="form-floating my-2">
                 <input type="text" class="form-control" id="responseValid" :v-model="responseValid" value="" placeholder="Indiquer la bonne réponse">
                 <label for="responseValid">Bonne réponse pour la question</label>
                 <div v-if="erreurs && erreurs.responseValid" class="text-danger">{{ erreurs.responseValid[0] }}</div>
               </div>

               <div class="form-floating">
                 <input type="text" class="form-control" id="responseError" :v-model="response" value="" placeholder="Indiquer la mauvaise réponse">
                 <label for="responseError">Mauvaise réponse pour la question</label>
                 <div v-if="erreurs && erreurs.responseError" class="text-danger">{{ erreurs.responseError[0] }}</div>
               </div>

            </div>
            
                <div class="text-center">
                  <button type="submit" class="btn btn-outline-primary btn-rounded my-4 waves-effect">Continuer</button>
                </div>

              </form>
               <div class="text-center">
                  <button v-if="numbers >= 5" @click="termine()" type="button" class="btn btn-outline-success btn-rounded my-4 ml-2 waves-effect">Terminer</button>
               </div>
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
  methods: {
     termine(){
        if (this.numbers < 5) {
               this.$notify({
                  group: 'success',
                  type: 'warning',
                  title: 'Alerte',
                  speed: 1000,
                  text: 'Désolé! Vous avez moins de 5 questions!',
               });
        } else {
         axios.post('/create/questions/valide/'+this.id)
         .then(response => {
            if (response.status == 200) {

               window.location = "/valide-questionnaire/"+this.id
            }
         })
         .catch(error => {

         });
        }
     },
      submit(){
        this.erreurs = {};
        axios.post('/create/questions/'+this.id, {
            question: question.value,
            responseValid: responseValid.value,
            responseError: responseError.value
         })
         .then(response => {
            if (response.status == 200) {
               question.value = "",
               responseValid.value = "",
               responseError.value = "",
               this.numbers = response.data
               this.$notify({
                  group: 'success',
                  type: 'success',
                  title: 'Succès',
                  speed: 1000,
                  text: 'Question enregistrée!',
               });
            }
         })
         .catch(error => {
            if (error.response.status == 422) {
                this.erreurs = error.response.data.errors || {};
            }
         });

     }
  },
  props: ['questionnaire', 'number'],
  data () {
    return {
       erreurs: {},
       numbers: this.number,
       question: '',
       response: '',
       responseValid: '',
       responseError: '',
       id: this.questionnaire.id
    }
  },
}
</script>