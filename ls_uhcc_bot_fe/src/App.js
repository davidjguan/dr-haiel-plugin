import './App.css';
import { WebChatContainer } from '@ibm-watson/assistant-web-chat-react';
import ResponseWithLLM from './components/ResponseWithLLM';

const botConfig = { //matches selected bot with it's integrationID
  purple:"d3261f12-24f9-4ddb-b8ac-fd08320de025",
  blue: "9a5f5f08-7bdc-406b-9a8c-18b4443c78b9"
};

// getting the selected bot from settings. Uses a question mark to avoid throwing error if null, and uses "purple" as default
const selectedBot = window.haielSettings?.selectedBot||"purple";
const botVersion = botConfig[selectedBot];

function renderCustomResponse(event, webChatInstance) {
  const { message } = event.data;
  // console.log(message);
  if (message.user_defined && message.user_defined.response_component === 'General_LLM_Response') {
    event.data.fullWidth = true;
    return <ResponseWithLLM llmRes={message.user_defined.llmRes} />;
  }
  return null;
}

function App() {

  console.log(selectedBot+ "is chosen from settings");
  return (
    
    <WebChatContainer 
      config={{
        // integrationID: ,
        // region: "us-east",
        // serviceInstanceID: "a9fc5d86-c7af-482f-9798-ef511615146b"

        integrationID: botVersion,
        region: "us-east", //these three variables can be replaced to get a different chatbot, but the latter two seem to stay the same
        serviceInstanceID: "a9fc5d86-c7af-482f-9798-ef511615146b"


      }}
      renderCustomResponse={renderCustomResponse}
    />
  );
}

export default App;
