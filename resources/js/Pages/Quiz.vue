<template>
   <div style="background-image: url('https://mdbootstrap.com/img/Photos/Others/gradient2.png'); background-repeat: no-repeat; background-size: cover; min-height:100vh;">
    
    <section class="px-md-5 mt-5 p-2 mx-md-5 text-center dark-grey-text" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg); background-size: cover; background-position: center center;">
      <h3 class="font-weight-bold mb-5">{{questions[counter].question}}</h3>

      <div>
         <h4 id="resultat"></h4>
      </div>

      <div v-if="rand == 0" class="row p-2" id="question">
        <div class="col-md-6 mb-4 mb-md-0 p-1" id="vrai">
          <p class="font-weight-bold my-3">{{questions[counter].reponse}}</p>
          <a @click="vrai()" class="btn btn-outline-primary btn-md choix" href="#" role="button">Choisir</a>
      </div>

        <div class="col-md-6 mb-4 mb-md-0 p-1" id="faux">
          <p class="font-weight-bold my-3">{{questions[counter].mauvaise_reponse}}</p>
          <a @click="faux()" class="btn btn-outline-primary btn-md choix" href="#" role="button">Choisir</a>
        </div>
      </div>

      <div v-else class="row p-2" id="question">
        <div class="col-md-6 mb-4 mb-md-0" id="faux">
          <p class="font-weight-bold my-3">{{questions[counter].mauvaise_reponse}}</p>
          <a @click="faux()" class="btn btn-outline-primary btn-md choix" href="#" role="button">Choisir</a>
        </div>

        <div class="col-md-6 mb-4 mb-md-0" id="vrai">
          <p class="font-weight-bold my-3">{{questions[counter].reponse}}</p>
          <a @click="vrai()" class="btn btn-outline-primary btn-md choix" href="#" role="button">Choisir</a>
        </div>
      </div>

      <div>
         <button id="suivante" @click="suivante()" class="visually-hidden btn btn-outline-dark">Question suivante</button>
         <button id="home" @click="home()" class="visually-hidden btn btn-outline-dark">Revenir au menu</button>
      </div>
      
    </section>
   </div>
</template>


<script>
export default {
  methods: {
     home(){
        window.location = "/quiz"
     },
     suivante(){
         if (this.questions.length-1 === this.counter) {
           document.querySelector('#resultat').innerHTML ='Quiz Terminé!'
           document.querySelector('#question').classList.add('visually-hidden')
           document.querySelector('#suivante').classList.add('visually-hidden')
           document.querySelector('#home').classList.remove('visually-hidden')
        } 
        else {
        this.counter++
        document.querySelector('#vrai').classList.remove('bg-success')
        document.querySelector('#faux').classList.remove('bg-danger')
        document.querySelector('#resultat').innerHTML =''
        document.querySelector('#suivante').classList.add('visually-hidden')
         var button = document.querySelectorAll('.choix');
          for(let i=0;i<=button.length-1;i++){
                 button[i].classList.remove('visually-hidden');
              }
        }

     },
     vrai(){
        document.querySelector('#vrai').classList.add('bg-success')
        document.querySelector('#faux').classList.add('bg-danger')
        document.querySelector('#resultat').innerHTML ='Bien Joué!'
        document.querySelector('#suivante').classList.remove('visually-hidden')
        var button = document.querySelectorAll('.choix');
          for(let i=0;i<=button.length-1;i++){
                 button[i].classList.add('visually-hidden');
              }
     },
     faux(){
        document.querySelector('#vrai').classList.add('bg-success')
        document.querySelector('#faux').classList.add('bg-danger')
        document.querySelector('#resultat').innerHTML ='Mauvaise réponse!'
        document.querySelector('#suivante').classList.remove('visually-hidden')
               var button = document.querySelectorAll('.choix');
          for(let i=0;i<=button.length-1;i++){
                 button[i].classList.add('visually-hidden');
              }
     },
  },
  data () {
    return {
      counter: 0,
      rand: 0,
    }
  },
  mounted() {
     this.rand = Math.round(Math.random());
  },
  props: ['questionnaire', 'questions'],
}

</script>