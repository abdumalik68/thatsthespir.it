import React from 'react';
import { Link } from "@reach/router"
import { ReactComponent as HandIcon } from '../assets/images/hand.svg';

class Footer extends React.Component {
    render() {
        return (
            <footer className="footer">
                <p>

                    <Link to="/newsletter">The Spirit! by email ?</Link> -
                    <Link to="/privacy-policy">Privacy policy</Link> -
                    <Link to="/of/humans">All Authors</Link> -
            Made by some <a href="https://pixeline.be" title="Brussels web agency">web designer in Brussels</a>
                    <br />
                    <HandIcon alt="V for Victory hand sign" className="hand" />
                </p>
            </footer>
        )
    }
}


export default Footer;
