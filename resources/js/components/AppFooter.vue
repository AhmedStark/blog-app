<template>
  <v-footer
    dark
    height="auto"
  >
    <v-card
      class="flex"
      flat
      tile
    >
      <v-card-title class="teal darken-4">
        <strong class="subheading">Find me on social networks!</strong>
      </v-card-title>
        <v-spacer></v-spacer>

        <div class="text-xs-center">
        <v-dialog
          v-model="dialog"
          width="500"
        >
              <template v-slot:activator="{ on }">

                <v-btn
                
                  v-for="icon in icons"
                  :key="icon"
                  class="mx-3"
                  dark
                  icon
                  v-on="on"
                >
                  <v-icon size="24px">{{ icon }}</v-icon>
                </v-btn>

              </template>

        

        <v-card>
                <v-form id="social" action="/social" methon="post">

                      
                    <input type="hidden" name="_token" :value="csrf" />

                    <v-card-title
                      class="headline grey lighten-2"
                      primary-title
                    >
                      Change my social media Links
                    </v-card-title>

                    <v-card-text>
                    <v-text-field
                      name="facebook"
                      label="Facebook link"
                      required
                      class="mx-4"
                      ></v-text-field>

                      <v-text-field
                      name="twitter"
                      label="Twitter link"
                      required
                      class="mx-4"
                      ></v-text-field>

                      <v-text-field
                      name="linkedin"
                      label="LinkedIn link"
                      required
                      class="mx-4"
                      ></v-text-field>

                      <v-text-field
                      name="insta"
                      label="Instagram link"
                      required
                      class="mx-4"
                      ></v-text-field>
                    
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                        color="primary"
                        flat
                        @click="dialog = false"
                      >
                        Cancel
                      </v-btn>
                      <v-btn
                        form="social"
                        color="primary"
                        flat
                        type="submit"
                        @click="dialog = false"
                      >
                        Done
                      </v-btn>
                    </v-card-actions>

                  </v-form>
              </v-card>
            </v-dialog>
          </div>

      <v-card-actions class="grey darken-3 justify-center">
        &copy;Ahmed Aldawoud <strong></strong>
      </v-card-actions>
    </v-card>
  </v-footer>
</template>

<script>
  export default {
    data: () => ({
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      dialog: false,
      icons: [
        'fa fa-facebook',
        'fa fa-twitter',
        'fa fa-linkedin',
        'fa fa-instagram'
      ]
    })
  }
</script>