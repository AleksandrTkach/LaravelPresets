export default {
    async example() {
        const json = await window.axios.get('/api/example');

        return json;
    },
};