library(rjson);
library(pwr);

x1 <- commandArgs()[5];

xx1 <- fromJSON(x1);

control_imp <- as.numeric(xx1["control_imp"]);
experimental_imp <-as.numeric(xx1["experimental_imp"]);
control_cv <- as.numeric(xx1["control_cv"]);
experimental_cv <- as.numeric(xx1["experimental_cv"]);

result <- chisq.test(matrix(c(control_imp - control_cv, experimental_imp - experimental_cv, control_cv, experimental_cv), nrow=2, byrow=T));

total_obs <- control_imp + experimental_imp;
cohen_w = sqrt(result$statistic / total_obs);
pwr_result <- pwr.chisq.test(N = total_obs, w = cohen_w, df = 1, sig.level = 0.05, power = NULL);

if(result$p.value <= 0.05){
    message_p <- "有意（偶然とは言えない差が認められた）"
} else {
    message_p <- "有意ではない（この差は偶然である可能性が高い）"
}

if(pwr_result$power >= 0.8){
    message_power <- "本当は差があるのに差がないとしてしまっている可能性は低い。"
} else {
    message_power <- "本当は差があるのに差がないとしてしまっている可能性は高い。"
}

xx1["p_value"] <- result$p.value;
xx1["power"] <- pwr_result$power;
xx1["message_p"] <- message_p;
xx1["message_power"] <- message_power;

cat(toJSON(c(xx1["p_value"],xx1["power"],xx1["message_p"],xx1["message_power"])));
