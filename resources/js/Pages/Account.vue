<template>

<div class="container my-5 p-5 z-depth-1 unique-color-dark">
  <section class="text-center white-text">
    <h2 class="font-weight-bold mb-4 pb-2 text-uppercase">Mon Espace</h2>

    <div class="row">

      <div class="col-md-4 mb-4">
         <i class="fas fa-users fa-3x purple-text"></i>
         <a href="#">
            <h5 class="font-weight-bold my-4 text-uppercase">Modifier mon compte</h5>
         </a>
      </div>

      <div class="col-md-4 mb-4">
        <i class="fab fa-sass fa-3x purple-text"></i>
        <a href="#">
            <h5 class="font-weight-bold my-4 text-uppercase">Créer un Quiz</h5>
        </a>
      </div>

      <div class="col-md-4 mb-4">
        <i class="fas fa-brain fa-3x purple-text"></i>
        <a href="#">
            <h5 class="font-weight-bold my-4 text-uppercase">Lancer un Quiz</h5>
        </a>
      </div>

    </div>
  </section>
</div>

</template>


<script>
export default {
  props: ['url'],
  methods: {

  },
  data () {
    return {
       count: 0
    }
  },
    
}
</script>