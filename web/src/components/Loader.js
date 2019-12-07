import React from "react";


const Loader = ({ overlay = true, children }) => {

    if (overlay) {
        return <div className="Loader">
            <div className="overlay">
                <div className="loading-message">
                    <div className="spinner"></div>
                    <div className="loading-message-text">{children}</div>
                </div>
            </div>
        </div>
    } else {
        // Without Overlay
        return <div className="Loader">
            <div className="loading-message">
                <div className="spinner"></div>
                <div className="loading-message-text">{children}</div>
            </div>
        </div>
    }
}

export default Loader;
