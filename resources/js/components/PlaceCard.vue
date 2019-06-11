<template>
  <div class="column is-one-third">
    <div class="card xlarge">
      <div class="card-image">
        <figure class="image">
          <a :href="link">
            <img :src="place.picture" :alt="place.title">
          </a>
        </figure>
      </div>
      <div class="card-content">
        <div class="media">
          <!--
        <div class="media-left">
          <figure class="image is-96x96">
            <img src="https://i.imgsafe.org/a4/a4bb9acc5e.jpeg" alt="Image">
          </figure>
        </div>
          -->
          <div class="media-content">
            <p class="title is-4 no-padding">
              <a :href="link" class="has-text-black">{{ place.title }}</a>
            </p>
            <p>
              <span class="title is-6">
                <a :href="mapslink" target="_blank">{{ place.address }}</a>
              </span>
            </p>
            <p class="subtitle is-6">{{ place.type }}</p>
          </div>
        </div>
        <div class="content">
          {{ place.content }}
          <div class="background-icon">
            <span class="icon-twitter"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  computed: {
    link() {
      return "/places/" + this.place._id;
    },
    mapslink() {
      return (
        "https://www.google.com/maps/place/" +
        this.place.latitude +
        "," +
        this.place.longitude +
        "/"
      );
    }
  },
  props: ["place"]
};
</script>
