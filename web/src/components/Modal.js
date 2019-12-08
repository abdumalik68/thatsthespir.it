import React from 'react';
import SSOProviderLink from '../components/SSOProviderLink';
import GitHubIcon from '../assets/images/github.svg';
import RedditIcon from '../assets/images/reddit.svg';
import TwitterIcon from '../assets/images/twitter.svg';
import GoogleIcon from '../assets/images/google.svg';

class Modal extends React.Component {
    render() {
        return (
            <section className="modal--show" id="login-ui" tabIndex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
                <a href="/#!" className="modal-close" onClick={this.props.modalCloseACtion} title="Click to close this." data-close="Close" data-dismiss="modal">?</a>
                <div className="modal-inner">
                    <div className="modal-content">
                        <p>To do that, you need to log in the Spirit via one of these services. It only takes a click and you're good to go.</p>
                        <ul className="single-signon-providers">
                            <li>
                                <SSOProviderLink url="http://localhost:8000/auth?provider=google&redirectTo=localhost:3000/newsletter" provider="google" label="Google"><GoogleIcon title="alt title for google icon"/></SSOProviderLink>
                            </li>
                            <li>
                                <SSOProviderLink provider="github" label="GitHub"><GitHubIcon/></SSOProviderLink>
                            </li>
                            <li>
                                <SSOProviderLink provider="reddit" label="Reddit"><RedditIcon /></SSOProviderLink>
                            </li>
                            <li>
                                <SSOProviderLink provider="twitter" label="Twitter" ><TwitterIcon /></SSOProviderLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        )
    }
}


export default Modal;
