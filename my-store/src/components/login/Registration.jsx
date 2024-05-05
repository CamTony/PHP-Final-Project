import React, { Component, useState } from "react";
import axios from "axios";//npm i axios

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

class Registration extends Component {

    constructor(props) {
        super(props);

        this.state = {
            name: '',
            email: '',
            password: ''
        }

        this.name = this.name.bind(this);
        this.email = this.email.bind(this);
        this.password = this.password.bind(this);
    }

    name(event) {
        this.setState({ name: event.target.value })
    }

    email(event) {
        this.setState({ email: event.target.value })
    }

    password(event) {
        this.setState({ password: event.target.value })
    }

    handleSubmit() {
        const packets = {
            name: this.state.name,
            email: this.state.email,
            password: this.state.password
        };

        axios.post('http://localhost:8000/api/ext/setUser', packets)
            .then(res => alert(JSON.stringify(response.data)))
            .catch(error => {
                console.log("Error: ", error.response.data);
            })
    }

    render() {
        return (
            <div class="div">
                <h5></h5>
                <input type="text" placeholder="Name" onChange={this.name} class="input" />
            </div>
        )
    }
}