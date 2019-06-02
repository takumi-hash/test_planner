library(rjson);
library(pwr);

x1 <- commandArgs()[5];

xx1 <- fromJSON(x1);

control_imp <- as.numeric(xx1["control_imp"]);
experimental_imp <-as.numeric(xx1["experimental_imp"]);
control_cv <- as.numeric(xx1["control_cv"]);
experimental_cv <- as.numeric(xx1["experimental_cv"]);

result <- chisq.test(matrix(c(control_imp, experimental_imp, control_cv, experimental_imp), nrow=2, byrow=T));

total_obs <- control_imp + experimental_imp;
cohen_w = sqrt(result$statistic / total_obs)
pwr_power <- pwr.chisq.test(N = total_obs, w = cohen_w, df = 1, sig.level = 0.05, power = NULL);

xx1["p_value"] <- result$p.value;
xx1["power"] <- pwr_result$power;
cat(toJSON(c(xx1["result_n"],xx1["power"])));
