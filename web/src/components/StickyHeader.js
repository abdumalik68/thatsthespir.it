import React from "react";
//import Headhesive from "../utils/headhesive";

class StickyHeader extends React.Component {

    componentDidMount() {
        window.addEventListener('scroll', this.stickyOnScroll);
    }

    componentWillUnmount() {
        window.removeEventListener('scroll', this.stickyOnScroll);
    }
    stickyOnScroll = () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop
        const stickyHeader = document.getElementById('stickyHeader');
        const clonedHeader = document.querySelector('.sticky--clone');
        const val = stickyHeader.scrollHeight + 200;
        if (clonedHeader) {
            if (winScroll > val) {
                clonedHeader.classList = 'sticky--clone sticky';
            } else {
                clonedHeader.classList = 'sticky--clone';
            }
        }
    }


    render() {
        const author = this.props.author;
        return (
            <>
                <header id="stickyHeader">
                    <h1 className="ui-title topline">Quotes by {author.fullname} </h1>
                    <figure className="author">
                        <div id="photo" className="photo " data-author="{author.fullname}"
                            style={author.photo ? { backgroundImage: `url(https://thatsthespir.it/uploads/${author.photo})` } : null} ></div>
                        <figcaption>{author.fullname} <br />
                            <small className="meta contribution">{author.total} quote
                                        {author.total > 1 ? `s` : null}
                            </small></figcaption>
                    </figure>
                </header>

                <header className="sticky--clone">
                    <h1 className="ui-title topline">Quotes by {author.fullname} </h1>
                    <figure className="author">
                        <div id="photo" className="photo " data-author="{author.fullname}"
                            style={author.photo ? { backgroundImage: `url(https://thatsthespir.it/uploads/${author.photo})` } : null} ></div>
                        <figcaption>{author.fullname} <br />
                            <small className="meta contribution">{author.total} quote
                                        {author.total > 1 ? `s` : null}
                            </small></figcaption>
                    </figure>
                </header>
            </>
        )
    }
}

export default StickyHeader;

