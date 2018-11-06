<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <page-home></page-home>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PageHome from './pages/Home.vue';

    export default {
        components: {
            PageHome,
        },
        mounted() {
            console.log('Component mounted.');
            this.$store.dispatch('example');
        },
    };
</script>
