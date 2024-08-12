import './App.css';
import { WebChatContainer } from '@ibm-watson/assistant-web-chat-react';
import ResponseWithLLM from './components/ResponseWithLLM';

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
  return (
    <WebChatContainer
      config={{
        integrationID: "d3261f12-24f9-4ddb-b8ac-fd08320de025",
        region: "us-east",
        serviceInstanceID: "a9fc5d86-c7af-482f-9798-ef511615146b"
      }}
      renderCustomResponse={renderCustomResponse}
    />
  );
}

export default App;
