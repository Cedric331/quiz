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
                <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Création des questions pour "{{questionnaire.titre}}"</h3>
               <p class="text-muted">Il faut au moins 5 questions pour valider le questionnaire</p>
            <div>

               <div class="form-floating">
                 <input type="text" class="form-control" id="question" :v-model="question" value="" placeholder="question">
                 <label for="question">Question</label>
                 <div v-if="erreurs && erreurs.question" class="text-danger">{{ erreurs.question[0] }}</div>
               </div>

               <div class="form-floating my-2">
                 <input type="text" class="form-control" id="response" :v-model="response" value="" placeholder="Indiquer la bonne réponse">
                 <label for="response">Bonne réponse pour la question</label>
                 <div v-if="erreurs && erreurs.response" class="text-danger">{{ erreurs.response[0] }}</div>
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
  props: ['questionnaire'],
  data () {
    return {
       erreurs: {},
       question: '',
       response: '',
    }
  },
}
</script>