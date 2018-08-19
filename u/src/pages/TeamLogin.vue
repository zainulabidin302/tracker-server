<template>
<div>
  <div class="content">
    <div class="md-layout screen-center">
      <div >
          <form >
          <md-card >
            <md-card-header>
              <h4 class="title">Login Area</h4>
              <p class="category"></p>
            </md-card-header>

            <md-card-content>
              <div class="md-layout">
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Manager Name </label>
                    <md-input v-model="manager"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-small-size-100 md-size-33">
                  <md-field>
                    <label>Password</label>
                    <md-input v-model="password" type="text"></md-input>
                  </md-field>
                </div>
                <div class="md-layout-item md-size-100 text-right">
                  <md-button class="md-raised md-success" @click="login">Login</md-button>
                  <div v-if="loading">loggin in</div>
                </div>
              </div>

            </md-card-content>
          </md-card>
        </form>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import {
  EditProfileForm,
  UserCard
} from '@/pages'
import config from './../config.js'
import axios from 'axios'
export default {
  data() {
    return {
      loading: false,
      manager: '',
      password: ''
    }
  },
  components: {
    EditProfileForm,
    UserCard
  },
  created() {
    config.post('team_loggedin.php')
      .then(a => {
        if (a.message == 'ok') {
          this.$router.push({
            path: '/dashboard'
          })
        }
      })
    },
  methods: {
    login() {
      config.post('team_login.php', {
          manager: this.manager,
          password: this.password
        })
        .then(a => {
          this.$router.push({
            path: '/dashboard'
          })
        })
      
      
    }
  },
}
</script>

<style >
.screen-center {
  width: 40%;
  margin: auto;
  margin-top: 10%;
}
.content {
  background: #fafafa;
}
</style>

