const ColorMixin = {
    methods: {
        getData() {
            this.preloader = true;
            this.none = false;
            axios.post('/api/colors/', {
                'color': this.color,
            })
                .then(response => {
                    if (response.data) {
                        this.colors = response.data.colors;
                        this.pairs = response.data.pairs;
                        this.pallets = response.data.pallets;

                        if (Object.keys(this.colors).length === 0) {
                            this.none = true;
                        }
                    }
                    this.preloader = false;
                })
                .catch(error => {
                    if (error.response.status == 422 || error.response.status == 429) {
                        console.log(error.response.data.errors);
                        this.preloader = false;
                    }
                });
        },
    }
}

export default ColorMixin;