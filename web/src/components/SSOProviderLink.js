import React from 'react';
import axios from 'axios';


class SSOProviderLink extends React.Component {

    state = {
        clicked: false
    }
    tryToLogin = () => {
        this.setState({ clicked: true });

        //const url = "http://localhost:8000/auth?provider=" + this.props.provider;
        // console.log(url, "url: ");
        axios
            .get(
                `http://localhost:8000/auth?provider=${this.props.provider}&redirectTo=localhost:3000/newsletter`)
            .then(res => {
                console.log(res);
                this.setState({ clicked: false });
            });
    }

    render() {
        return (
            <a href={this.props.url} provider={this.props.provider} className="no-underline">
                {this.props.children}<br />{this.props.label}
            </a>
        );
    }
}

export default SSOProviderLink;
