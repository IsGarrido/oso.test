<template>
  <div class="box">
    <div class="columns">

      <div class="column is-one-fifth"></div>

      <div class="column">
        <div class="field has-addons">
          <div class="control is-expanded">
            <input class="input" type="search" placeholder="Buscar" v-model="search">
          </div>
          <div class="control">
            <a class="button is-info" @click="searchChanged">Search</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
     data: function(){
        return { search: "" }
    },
    methods: {
        searchChanged(){
            console.log("Seach changed!!! " + this.search);
            this.$emit('searched', this.search);
        }
    }
};
</script>
