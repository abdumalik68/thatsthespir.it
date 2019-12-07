import React from 'react';
import Share from './Share';


function Quote({ showAuthor, quote }) {

    const [{ body, fullname, author_slug, photo, total }] = [{ ...quote }];

    return (
        <div className="quote single-quote">
            <blockquote className="">
                <span className="guillemets" />
                <span className="the-quote" dangerouslySetInnerHTML={{ __html: body }}></span>
                <span className="pilcrow">|</span>
            </blockquote>
            {showAuthor ? <div className="author">
                <div className="photo" style={photo ? { backgroundImage: `url(https://thatsthespir.it/uploads/${photo})` } : null} />
                <address className="author">–&nbsp;
                    <a title={`All quotes by ${fullname}`} href={`/author/${author_slug}`} rel="author" className="authorName">
                        {fullname}<br />
                        <small className="meta">{total} quote{total > 1 ? 's' : null}</small>
                    </a>
                </address>
            </div> : null}

            <Share quote={quote} />
        </div>
    )
}

export default Quote;
