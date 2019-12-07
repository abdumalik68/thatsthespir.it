import React from 'react';
import Autosuggest from 'react-autosuggest';
import AutosuggestHighlightMatch from 'autosuggest-highlight/match';
import AutosuggestHighlightParse from 'autosuggest-highlight/parse';
import KeyboardEventHandler from 'react-keyboard-event-handler';
import { Container, Row, Col } from 'react-bootstrap';
import { navigate } from "@reach/router"
import API from "../utils/Api";
import Loader from './Loader';

import he from 'he';

// TODO! use ajax instead
//import allQuotes from '../data/all_quotes_full.json';
/**
 * Autosuggest feature:
 * source: https://github.com/moroshko/react-autosuggest
 */


// When suggestion is clicked, Autosuggest needs to populate the input
// based on the clicked suggestion. Teach Autosuggest how to calculate the
// input value for every given suggestion.
const getSuggestionValue = (suggestion) => {
    //return suggestion;
    return he.decode(`${suggestion.fullname} - ${suggestion.value}`);
}

// Use your imagination to render suggestions.
const renderSuggestion = (suggestion, { query }) => {

    //const suggestionText = he.decode(suggestion.value);
    const suggestionText = suggestion.value;

    const matches = AutosuggestHighlightMatch(suggestionText, query);
    const parts = AutosuggestHighlightParse(suggestionText, matches);

    return (
        <div className="quote-preview">
            <span className="quote-preview-author">
                {suggestion.photo ? (<img alt="" className="tinythumb" src={`https://thatsthespir.it/uploads/${suggestion.photo}`} />) : null}
                {suggestion.fullname}
            </span>
            <span className="quote-preview-quote"> –
            {
                    parts.map((part, index) => {
                        const className = part.highlight ? 'highlight' : null;
                        return (
                            <span className={className} key={index}>{part.text.replace(/<[^>]+>/g, '')}</span>
                        );
                    })
                }
            </span>
        </div>
    )
};

class Search extends React.Component {
    constructor(props) {
        super(props);

        // Autosuggest is a controlled component.
        // This means that you need to provide an input value
        // and an onChange handler that updates this value (see below).
        // Suggestions also need to be provided to the Autosuggest,
        // and they are initially empty because the Autosuggest is closed.
        this.state = {
            value: '',
            suggestions: [],
            loading: undefined
        };
    }

    onChange = (event, { newValue, method }) => {
        this.setState({
            value: newValue
        });
    };

    onSuggestionSelectedHandler = (event, { suggestion, suggestionValue, suggestionIndex, sectionIndex, method }) => {
        /* When suggestion is selected, Update UI to display the selected quote */
        this.props.setQuoteHandler(suggestion);
        // console.log(suggestion, "search: selected suggestion, before routing");
        navigate('/' + suggestion.url);
        this.setState({
            value: ''
        });

    }

    onSuggestionsFetchRequested = ({ value }) => {
        //
        if (value.length > 3) {
            this.setState({ loading: true });
            API.get(`https://api.thatsthespir.it/v1/quotes/search?query=${value}`)
                .then(response => {
                    //   console.log(response.data.suggestions);
                    return response.data.suggestions;
                })
                .then(suggestions => {
                    //  console.log(Array.from(data));
                    this.setState({ suggestions: suggestions, loading: false })

                })
                .catch(err => {
                    console.log(err);
                    return null;
                });
        }
    }



    // Autosuggest will call this function every time you need to clear suggestions.
    onSuggestionsClearRequested = () => {
        this.setState({
            suggestions: [],
            loading: undefined,
            value: ''
        });
    };
    inputReference = autosuggest => {
        if (autosuggest !== null) {
            this.input = autosuggest.input;
        }
    }
    render() {
        const { value, suggestions } = this.state;

        // Autosuggest will pass through all these props to the input.
        const inputProps = {
            placeholder: 'Search for a quote or author name',
            value,
            onChange: this.onChange
        };
        return (
            <section className="search">
                <KeyboardEventHandler
                    handleKeys={['ctrl+f']}
                    onKeyEvent={(key, e) => this.input.focus()} />

                <Container className="content">
                    <Row>
                        <Col xs={12}>
                            {this.state.loading ? <Loader overlay="false" >Searching...</Loader> : null}
                            <h1 className="ui-title topline">search</h1>
                            <Autosuggest
                                ref={this.inputReference}
                                suggestions={suggestions}
                                onSuggestionsFetchRequested={this.onSuggestionsFetchRequested}
                                onSuggestionsClearRequested={this.onSuggestionsClearRequested}
                                onSuggestionSelected={this.onSuggestionSelectedHandler}
                                getSuggestionValue={getSuggestionValue}
                                renderSuggestion={renderSuggestion}
                                inputProps={inputProps}
                            />
                        </Col>
                    </Row>
                </Container>

            </section>
        )
    }


}

export default Search;
