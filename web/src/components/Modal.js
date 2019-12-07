import React from 'react';
import SSOProviderLink from '../components/SSOProviderLink';

class Modal extends React.Component {

    componentDidMount() {
    }

    render() {
        return (
            <section className="modal--show" id="login-ui" tabIndex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
                <a href="/#!" className="modal-close" onClick={this.props.modalCloseACtion} title="Click to close this." data-close="Close" data-dismiss="modal">?</a>
                <div className="modal-inner">
                    <div className="modal-content">
                        <p>To do that, you need to log in the Spirit via one of these services. It only takes a click and you're good to go.</p>
                        <ul className="single-signon-providers">
                            <li>
                                <SSOProviderLink url="http://localhost:8000/auth?provider=google&redirectTo=localhost:3000/newsletter" image="/assets/images/google.svg" provider="google" label="Google" />
                            </li>
                            <li>
                                <SSOProviderLink image="/assets/images/github.svg" provider="github" label="GitHub" />
                            </li>
                            <li>
                                <SSOProviderLink image="/assets/images/reddit.svg" provider="reddit" label="Reddit" />
                            </li>
                            <li>
                                <SSOProviderLink image="/assets/images/twitter.svg" provider="twitter" label="Twitter" />
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        )
    }
}


export default Modal;
