<template>
  <div class>
    <div class="columns">
      <!-- c1 -->
      <div class="column is-4">
        <div class="field">
          <div class="control">
            <div class="select is-info is-fullwidth is-large">
              <select v-model="selectedType" @change="typeChanged">
                <option>Todos los tipos</option>
                <option v-for="type in types" :key="type" :value="type">{{ type }}</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <!-- c2 -->
      <div class="column is-6">
        <div class="field has-addons">
          <div class="control is-expanded">
            <input @input="searchChanged" class="input is-large" type="search" placeholder="Buscar" v-model="search" >
          </div>
          <div class="control">
            <a class="button is-info is-large" @click="searchChanged">Buscar</a>
          </div>
        </div>
      </div>

      <!-- c3 -->
      <div class="column is-2">
            <a class="button is-primary is-large is-fullwidth" href="/places/create" >&#43; Nuevo</a>
      </div>
    </div>
  </div>
</template>

<script>
const axios = require("axios");

export default {
  data: function() {
    return {
      search: "",
      types: [],
      selectedType: "Todos los tipos"
    };
  },
  mounted: function() {
    var url = "/api/placetypes";

    axios.get(url).then(response => {
      console.log(response);
      this.types = response.data;
    });
  },
  methods: {
    searchChanged() {
      this.$emit("search-changed", this.search);
    },
    typeChanged() {
      if (this.selectedType === "Todos los tipos")
        this.$emit("type-changed", "");
      else this.$emit("type-changed", this.selectedType);
    }
  }
};
</script>
