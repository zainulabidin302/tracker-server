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
                    <label>Username </label>
                    <md-input v-model="username"></md-input>
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
export default {
  data() {
    return {
      loading: false,
      username: '',
      password: ''
    }
  },
  components: {
    EditProfileForm,
    UserCard
  },
  created() {
    console.log('created')
      fetch(config.api_url + "loggedin.php").then(res => res.json())
      .then(res => {
        if (res.message == 'ok') {
          this.$router.push({
            path: '/'
          })
        }
      }).catch(err => {
        console.log(err)
      })
    },
  methods: {
    
    login() {
      this.loading = true
      let form = new FormData()
      form.append('username', this.username)
      form.append('password', this.password)
      let opts = {
        method: 'POST',
        body: form
      }
      let url = config.api_url + "login.php"
      fetch(url, opts)
      .then(res => res.json())
      .then(res => {
        this.loading = false
        if (res.message == 'ok') {
          this.$router.push({
            path: '/'
          })
        }
      })
      .catch(err => {
        this.loading = false
        console.log(err)
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

