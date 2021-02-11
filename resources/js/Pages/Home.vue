<template>

<div class="container my-5 px-0 z-depth-1">
  <section class="text-center white-text grey p-5"
    style="background-image: url(https://mdbootstrap.com/img/Photos/Others/background.jpg);">
    <div class="row d-flex justify-content-center">

      <div class="col-md-6">
          <a :href="url" class="font-weight-bold">Call to action</a>
          <p @click="noir()" id="noir">Il va faire tout noir.</p>
          <a href="#" class="btn btn-outline-white btn-md waves-effect ml-0" role="button"><i class="fas fa-clone mr-2"></i>View project</a>
          <a href="#" class="btn btn-outline-white btn-md waves-effect" role="button"><i class="fas fa-download mr-2"></i>Download</a>
      </div>
    </div>
  </section>
</div>
</template>


<script>
export default {
  props: ['url'],
  methods: {
     add(){
        this.count++;
        console.log(this.url)
     },
     noir(){
        document.querySelector('#noir').setAttribute('style', 'background-color:black;')
     }
  },
  data () {
    return {
       count: 0
    }
  },
    
}
</script>