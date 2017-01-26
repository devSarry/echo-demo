<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>

                    <ul>
                        <li v-for="m in messages">{{ m.text }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messages: []
            }
        },
        mounted() {
            console.log('Component ready.');

            Echo.channel('channel.1').listen('MessageCreated', e => {
                    this.messages.push(e.message)
                    console.log(e);
            });


        }
    }
</script>
