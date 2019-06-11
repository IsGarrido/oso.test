<template>
  <div>
    <place-search @search-changed="titleChanged" @type-changed="typeChanged"></place-search>
    <div class="row columns is-multiline is-centered">
      <place-card v-for="place in places" :place="place" v-bind:key="place.id"></place-card>
    </div>

    <!-- BOTONES -->
    <div class="columns">
      <div class="column has-text-centered is-offset-3 is-3">
        <button class="button is-fullwidth is-large is-info" @click="prev()">&#8592; Anterior página</button>
      </div>
      <div class="column has-text-centered is-3">
        <button class="button is-fullwidth is-large is-info" @click="next()">Siguiente página &#8594;</button>
      </div>
    </div>

    <!-- -->
  </div>
</template>

<script>
const axios = require("axios");

export default {
  mounted() {
    console.log("Component mounted.");
    this.fetchData();
  },
  data: function() {
    return {
      text: "",
      type: "",
      page: 0,
      places: []
    };
  },
  methods: {
    fetchData() {
      scroll(0, 0);

      var url = "/api/place";
      url += "?title=" + this.text;
      if (this.type != "") url += "&type=" + this.type;
      url += "&page=" + this.page;

      axios.get(url).then(response => {
        console.log(response);
        this.places = response.data;
      });

      console.log("AJAX " + this.text);
    },
    titleChanged(searchedText) {
      this.text = searchedText;
      this.page = 0;
      this.fetchData();
    },
    typeChanged(type) {
      this.type = type;
      this.page = 0;
      this.fetchData();
    },
    prev() {
      if (this.page > 0) {
        this.page--;
        this.fetchData();
      }
    },
    next() {
      if (this.places.length > 0) {
        this.page++;
        this.fetchData();
      }
    }
  }
};
</script>
