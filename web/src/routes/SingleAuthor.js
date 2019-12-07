import React from 'react';
import Search from '../components/Search';
import Quote from '../components/Quote';
import StickyHeader from '../components/StickyHeader';
import { setQuoteFromSearch, fetchData } from '../utils/Helper'
import Loader from '../components/Loader';

class SingleAuthor extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            data: {},
            loading: undefined
        };
        this.fetchData = fetchData.bind(this);
        this.setQuoteFromSearch = setQuoteFromSearch.bind(this);
    }

    componentDidMount() {
        this.fetchData('/author/' + this.props.authorSlug + '?fields=quotes');
    }

    componentWillReceiveProps(props) {
        // const { authorSlug } = props;
        // if (authorSlug !== this.props.authorSlug) {
        //     console.log("ok, refresh");
        // }
    }

    render() {
        const quotes = this.state.data.quotes;
        return (
            <div className="content">
                {this.state.loading ? <Loader>Mmmh, let me think...</Loader> : null}

                <div id="stickyHeaderContainer">
                    <StickyHeader author={this.state.data} />
                </div>

                <div className="author-quotes">
                    {quotes && quotes.map((value, index) => {
                        return (
                            <div key={index}>
                                <Quote quote={value} showAuthor={false} />
                                <span className="sep">⤫</span>
                            </div>
                        )
                    })}
                </div>

                <Search setQuoteHandler={this.setQuoteFromSearch} />
            </div>
        )
    }
}


export default SingleAuthor;
