<template>
  <div>
    hello
    <a href="digitalocean/refresh">Refresh Cache</a>

    <div class="container-fluid">
      <div class="col-24">
        <div class="m-backup" style="background:#fff;padding:2rem;">
          <h1 style="margin-bottom:1.5rem;">Digital Ocean</h1>
          <div class="row">
            <div class="col-sm-6">
              <strong>Name</strong>
            </div>

            <div class="col-sm-10">
              <strong>Snapshots</strong>
            </div>
          </div>

          <div
            class="row"
            v-for="droplet in droplets"
            :key="droplet.id"
            style="display:flex;align-items:center;min-height:2rem;margin-top:0.5rem;background:#fafafa"
          >
            <div class="col-sm-6">
              {{droplet.name}}
              <br>
              {{droplet.id}}
              <br>
              {{droplet.sizeSlug}}
              <br>
              <button @click="createSnapshotFromDroplet(droplet.id)">Create Snapshot</button>
            </div>

            <div class="col-sm-10">
              <ul>
                <li
                  style="margin-top:1rem;"
                  v-for="(snapshot) in droplet.snapshots"
                  :key="snapshot.id"
                >
                  <div class="row">
                    <div class="col-sm-12">
                      <strong>{{snapshot.name}}</strong>
                      <br>
                      <i>{{snapshot.createdAt}}</i>
                    </div>

                    <div class="col-sm-12">
                      <button
                        @click="deleteSnapshot(snapshot.id)"
                        style="border:0;background:#fb6d52;color:#fff; padding:0.2rem;width:100%;"
                      >Deletes Snapshot</button>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  name: "droplets",
  data() {
    return {
      droplets: []
    };
  },
  created() {
    axios
      .get("digitalocean/droplets/get")
      .then(response => {
        this.droplets = response.data;
      })
      .catch(function(error) {
      })
      .then(function() {
      });
  },
  methods: {
    deleteSnapshot(id) {
      
      const url = "digitalocean/snapshot/delete/" + id;
      
      axios
        .get(url)
        .then(response => {
          alert(response.data);
        })
        .catch(function(error) {
          console.log(error.response.data);
        })
        .then(function() {
          // always executed
        });
    },
    createSnapshotFromDroplet(id) {

      const url = "digitalocean/snapshot/create/" + id;
      
      axios
        .get(url)
        .then(response => {
          alert(response.data);
        })
        .catch(function(error) {
          console.log(error.response.data);
        })
        .then(function() {
          // always executed
        });
    }
  }
};
</script>

