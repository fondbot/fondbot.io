<template>
    <div>
        <span class="select is-small">
            <select v-model="version">
                <option v-for="version in versions">{{ version }}</option>
            </select>
        </span>

        <span class="select is-small">
            <select v-model="language">
                <option v-for="(title, key) in languages" v-bind:value="key">{{ title }}</option>
            </select>
        </span>

        <a :href="url" class="button is-small">
            <span class="icon is-small"><i class="fa fa-github"></i></span>
            <span>Edit on GitHub</span>
        </a>
    </div>
</template>
<script>
    export default {
        props: [
            'currentVersion',
            'currentLanguage',
            'currentPage',
            'languages',
            'versions',
        ],
        data() {
            return {
                language: '',
                version: ''
            }
        },
        mounted() {
            this.language = _.head(_.keys(this.languages));
            this.version = _.head(this.versions);
        },
        computed: {
            url: function () {
                return 'https://github.com/fondbot/docs/blob/' + this.currentVersion + '/' + this.currentLanguage + '/' + this.currentPage + '.md';
            }
        },
        watch: {
            language: function () {
//                console.log(this.language);
            },
            version: function () {
//                console.log(this.version);
            }
        }
    }
</script>