import React, {useEffect, useState} from "react";
import Login from "../login/Login";

function Home() {

    const [isLoggedIn, setIsLoggedIn] = useState(false);


    return (
        <>
            <div>
                Show menu<br></br>

                
                <button
                    onClick={() => {
                        sessionStorage.clear();
                        setIsLoggedIn(false);
                    }}
                >
                    Log out
                </button>


                <div style={{ margin: "20px" }}>
                    Your Shopping Cart implementation
                </div>


                <button>
                    
                </button>
            </div>
        </>
    )
}

export default Home;