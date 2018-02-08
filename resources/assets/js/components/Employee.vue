<template>
    <tile :position="position">
        <section class="employee">
            <h1 class="employee__title">{{ employee }}</h1>
        </section>
    </tile>
</template>

<script>
import echo from '../mixins/echo';
import Tile from './atoms/Tile';

export default{

    components: {
        Tile
    },

    mixins : [echo],

    props : ['employee','position','email'],

    data(){
        return {
        }
    },

    methods : {

        getStatus : function(email){

            axios.get('/users/' + email + '/status').then((response) => {
                console.log(response);
            },(response) => {

            })

            console.log(email);
        }

    },


    created() {
        this.getStatus(this.email);
    }



};

</script>