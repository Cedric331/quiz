<template>
<div style="background-image: url('https://mdbootstrap.com/img/Photos/Others/gradient2.png'); background-repeat: no-repeat; background-size: cover; min-height:100vh;">

        <h3 class="font-weight-bold mb-4 pb-2 text-center dark-grey-text">Thème du Quiz</h3>

       <div class="form-floating container p-2">
         <select class="form-select" id="theme" aria-label="Theme du questionnaire">
           <option disabled selected>Choisir un thème</option>
           <option @click="submit()" v-for="theme in themes" :key="theme.id" :v-model="theme" :value="theme.titre">{{theme.titre}}</option>
         </select>
         <label for="theme">Thème du questionnaire</label>
         <div v-if="erreurs && erreurs.theme" class="text-danger">{{ erreurs.theme[0] }}</div>
       </div>

        <div class="text-center">
          <button v-if="value != ''" type="button" @click="reset()" class="ml-2 btn btn-outline-primary btn-rounded my-4 waves-effect">Voir tout les quiz</button>
        </div>
      <hr>

   <section class="dark-grey-text text-center container my-2">

      <h3 class="text-center font-weight-bold mb-4 pb-2">Nos Quiz <p class="d-inline" v-if="value">sur le thème {{value}}</p></h3>
      <p class="text-center text-muted w-responsive mx-auto mb-5"></p>

    <div class="row">

      <div v-if="quizz.length == 0" >
         <h2>Oups! Nous n'avons pas de quiz avec ce thème, vous pouvez <a :href="url">créer un quiz</a> si vous le voulez</h2>
      </div>

      <div v-for="quiz in quizz" :key="quiz.id" class="col-md-4 mb-4" >
        <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg);">
          <div class="text-white d-flex align-items-center py-5 px-4 px-md-5 m-auto">
            <div>
              <h3 class="py-3 font-weight-bold">
                <strong>Titre : {{quiz.titre}}</strong>
              </h3>
              <h4 class="py-3 font-weight-bold">
                <strong>Thème : {{quiz.theme}}</strong>
              </h4>
              <p>Nombre de question: {{quiz.number}}</p>
              <button type="button" @click="startQuiz(quiz.id)" class="btn btn-light btn-rounded btn-md">Faire ce Quiz</button>
            </div>
          </div>
        </div>
      </div>

   </div>
  </section>
</div>
</template>


<script>
export default {
  methods: {
      startQuiz(id){
         window.location = '/quiz/'+id
     },
     submit(){
        this.value = theme.value
        axios.get('/reset/quiz')
         .then(response => {
            if (response.status == 200) {
              this.quizz = response.data
               const array = []

            for(let i= 0; i != this.quizz.length;i++){
               if (this.quizz[i].theme == theme.value) {
                  array.push(this.quizz[i]);
               }
             }
             this.quizz = array
            }
         })
         .catch(error => {
         });
     },
      reset(){
         this.value = ''
        axios.get('/reset/quiz')
         .then(response => {
            if (response.status == 200) {
              this.quizz = response.data
            }
         })
         .catch(error => {
         });
     }
  },
  data () {
    return {
       erreurs: {},
       value: '',
       array: '',
       quizz: this.questionnaires
    }
  },
  props: ['themes', 'questionnaires', 'url'],

}

</script>