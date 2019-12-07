import React from 'react';
import ReactDOM from 'react-dom';
import { Router, navigate } from "@reach/router"

// Routes
import Home from './routes/Home';
import Newsletter from './routes/Newsletter';
import SingleQuote from './routes/SingleQuote';
import SingleAuthor from './routes/SingleAuthor';
import HallOfFame from './routes/HallOfFame';
import SuggestAQuote from './routes/SuggestAQuote';
import AllAuthors from './routes/AllAuthors';
// Components
import PrivacyPolicy from './components/PrivacyPolicy';
import Header from './components/Header';
import Footer from './components/Footer';
import Modal from './components/Modal';
import Loader from './components/Loader';
import './assets/scss/global.scss';
import { fetchData } from './utils/Helper';

//import * as serviceWorker from './serviceWorker';

class TheSpirit extends React.Component {
    constructor(props) {
        super(props);
        // Set the state here. Use "props" if needed.
        this.state = {
            data: {},
            loading: undefined
        };
        this.goHome = this.goHome.bind(this);
        this.fetchData = fetchData.bind(this);
    }
    componentDidMount() {
        this.fetchData('quote/random');
    }

    goHome = event => {
        event.preventDefault();
        this.fetchData('quote/random');
        navigate('/');
        window.scroll(0, 0);
    }

    suggestAQuoteAction = (e) => {
        // TODO: make this variable dynamic
        const logged_in = false;
        if (!logged_in) {
            this.showModal(e);
        } else {
            return true;
        }
    }
    showModal = event => {
        event.preventDefault();
        document.getElementById('login-ui').setAttribute('class', 'modal--show is-active');
    }

    closeModal = event => {
        event.preventDefault();
        document.getElementById('login-ui').setAttribute('class', 'modal--show');
    }

    render() {
        return (
            <div className="wrapper" id="TheSpirit" >
                <Header homeButtonAction={this.goHome} suggestAQuoteAction={this.suggestAQuoteAction} />
                <div id="content" className={this.state.loading ? '"loading"' : null}>
                    {this.state.loading ? <Loader>Mmmh, let me think...</Loader> : null}
                    <Router>
                        <Home path="/" quote={this.state.data} />
                        <Newsletter path="/newsletter" />
                        <SingleQuote path="/quote/:quoteSlug" />
                        <SingleAuthor path="/author/:authorSlug" />
                        <PrivacyPolicy path="/privacy-policy" />
                        <HallOfFame path="/hall-of-fame" />
                        <SuggestAQuote path="/suggest-a-quote" />
                        <AllAuthors path="/of/humans" />
                    </Router >
                </div>
                <Footer />
                <Modal modalCloseACtion={this.closeModal} />
            </div>
        )
    }
}


ReactDOM.render(<TheSpirit />, document.getElementById('root'));

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
//serviceWorker.unregister();
